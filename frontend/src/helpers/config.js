import axios from "axios";


export const axiosRequest = axios.create({
baseURL: import.meta.env.VITE_API_BASE_URL || 'http://localhost:8000/api'
})

export const getConfig = (token,contentType) => {
    return {
        headers: {
            "Content-type": contentType || "application/json",
            "Authorization": `Bearer ${token}`
        }
    }
}