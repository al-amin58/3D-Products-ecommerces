import { useAuthStore } from '@/stores/useAuthStore.js'

export default (to, from, next) => {
    const auth = useAuthStore()

    const exceptionalRoutes = ['Index']
    const isGoingExceptionalRoutes = exceptionalRoutes.includes(to.name)

    const authProtectedRoutes = ['dashboard']
    const isAuthProtected = authProtectedRoutes.includes(to.name)

    if (!auth.isLoggedIn && isAuthProtected) {
        next({ name: 'Index' })
    } else if (auth.isLoggedIn && isGoingExceptionalRoutes) {
        next({ name: 'dashboard', query: { 'redirect-reason': 'already logged' } })
    } else {
        next()
    }
}