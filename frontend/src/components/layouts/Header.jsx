import React, {useEffect} from 'react';
import {useDispatch, useSelector} from "react-redux";
import {Link, useLocation} from "react-router-dom";
import {axiosRequest} from "../../helpers/config.js";
import {getConfig} from "../../helpers/config.js";
import {setCurrentUser, setLoggedInOut, setToken} from "../../redux/slices/userSlice.js";
import {toast} from "react-toastify";


function Header(props) {
    const {isLoggedIn, token, user} = useSelector(state => state.user)
    const {cartItems} = useSelector(state => state.cart)
    const dispatch = useDispatch()
    const location = useLocation()

    useEffect(() => {
        const getLoggedInUser = async () => {
            try {
                const response = await axiosRequest.get('user', getConfig(token))
                dispatch(setCurrentUser(response.data.user))
            } catch (error) {
                if (error?.response?.status === 401) {
                    dispatch(setCurrentUser(null))
                    dispatch(setToken(''))
                    dispatch(setLoggedInOut(false))
                }
                console.log(error)
            }
        }
        if (token) getLoggedInUser()
    }, [token])

    const logoutUser = async () => {
        try {
            const response = await axiosRequest.post('user/logout',null,getConfig(token))
            dispatch(setCurrentUser(null))
            dispatch(setToken(''))
            dispatch(setLoggedInOut(false))
            toast.success(response.data.message)
            props.setGoToCart(false)
        } catch (error) {
            console.log(error)
        }
    }



    return (<nav className="navbar navbar-expand-lg navbar-light bg-light">
            <Link className="navbar-brand" to='/'>
                <i className="bi bi-shop h1"></i>
            </Link>
            <button className="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse" id="navbarSupportedContent">
                <ul className="navbar-nav mx-auto mr-auto">
                    <li className="nav-item active">
                        <Link className={`nav-link ${location.pathname === '/' && 'active'}`} aria-current='page' to='/'>
                            <i className="bi bi-house"></i> Home
                        </Link>
                    </li>
                    {
                        isLoggedIn ?
                            <>
                                <li className="nav-item">
                                    <Link className={`nav-link ${location.pathname === '/profile' && 'active'}`} aria-current="page" to="/profile">
                                        <i className="bi bi-person"></i> {user?.name}
                                    </Link>
                                </li>
                                <li className="nav-item">
                                    <Link className="nav-link" aria-current="page" to="#"
                                          onClick={() => logoutUser()}>
                                        <i className="bi bi-person-fill-down"></i> Logout
                                    </Link>
                                </li>
                            </>
                            :
                            <>
                                <li className="nav-item">
                                    <Link className={`nav-link ${location.pathname === '/register' && 'active'}`} aria-current="page" to="/register">
                                        <i className="bi bi-person-add"></i> Register
                                    </Link>
                                </li>
                                <li className="nav-item">
                                    <Link className={`nav-link ${location.pathname === '/login' && 'active'}`} aria-current="page" to="/login">
                                        <i className="bi bi-person-fill-up"></i> Login
                                    </Link>
                                </li>
                            </>
                    }
                    <li className="nav-item">
                        <Link className="nav-link" to='/cart'>
                            <i className="bi bi-bag"></i> Cart ({cartItems?.length})
                        </Link>
                    </li>

                </ul>

            </div>
        </nav>);
}

export default Header;