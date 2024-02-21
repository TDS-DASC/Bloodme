import axios from "axios";
import router from "../router/index.js";

const axiosClient = axios.create({
    withCredentials: true,
    withXSRFToken: true,
})

/* axiosClient.interceptors.request.use(config => {
    config.headers.Authorization = `Bearer ${store.state.user.token}`
    return config;
})
 */
/* axiosClient.interceptors.response.use(response => {
    return response;
}, error => {
    if (error.response.status === 401) {
        store.commit('setToken', null)
        router.push({name: 'login'})
    }
    throw error;
}) */

export default axiosClient;