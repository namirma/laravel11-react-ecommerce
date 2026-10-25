import axios from "axios";


export const axiosRequest = axios.create({
baseURL:'http://localhost:8000/api'
})

export const getConfig = (token,contentType) => {
    return {
        headers: {
            "Content-type": contentType || "application/json",
            "Authorization": `Bearer ${token}`
        }
    }
}