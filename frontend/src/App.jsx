import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Header from "./components/layouts/Header.jsx";
import Home from "./components/Home.jsx";
import Product from './components/products/Product.jsx'
import Cart from "./components/cart/Cart.jsx";
import Checkout from "./components/checkout/Checkout.jsx";
import Register from "./components/user/Register.jsx";
import Login from "./components/user/Login.jsx";
import Profile from "./components/user/Profile.jsx";
import {useState} from "react";
import PayByStripe from "./components/checkout/PayByStripe.jsx";
import UserOrders from "./components/user/UserOrders.jsx";
import PageNotFound from "./components/404/PageNotFound.jsx";

function App() {
    const [GoToCart, setGoToCart] = useState(false)
    return (
        <BrowserRouter>
            <Header setGoToCart={setGoToCart} />
            <Routes>
                <Route path="/" element={<Home/>} />
                <Route path="/product/:slug" element={<Product/>} />
                <Route path="/cart" element={<Cart/>} />
                <Route path="/checkout" element={<Checkout setGoToCart={setGoToCart}/>} />
                <Route path="/register" element={<Register/>} />
                <Route path="/login" element={<Login GoToCart={GoToCart}/>} />
                <Route path="/profile" element={<Profile/>} />
                <Route path="/pay/order" element={<PayByStripe/>} />
                <Route path="/user/orders" element={<UserOrders/>} />
                <Route path="*" element={<PageNotFound/>} />
            </Routes>
        </BrowserRouter>
    );
}

export default App;