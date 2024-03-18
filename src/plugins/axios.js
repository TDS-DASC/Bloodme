import axios from "axios";

const axiosClient = axios.create({
    withCredentials: true,
    withXSRFToken: true,
    /* baseURL: "http://127.0.0.1:8000", */
    baseURL: "http://localhost:8000"
})

export default axiosClient;