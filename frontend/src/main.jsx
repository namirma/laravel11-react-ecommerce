import {StrictMode} from 'react'
import {createRoot} from 'react-dom/client'
import App from './App.jsx'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css'
import 'react-toastify/dist/ReactToastify.css'
import './index.css'
import {ToastContainer, toast} from "react-toastify";
import {Provider} from "react-redux";
import {persistor, store} from "./redux/store/index.js";
import {PersistGate} from "redux-persist/integration/react";

createRoot(document.getElementById('root')).render(
    <Provider store={store}>
        <PersistGate persistor={persistor}>
            <div className='container card shadow-sm my-4'>
                <ToastContainer position='top-right'/>
                <App/>
            </div>
        </PersistGate>
    </Provider>

)
