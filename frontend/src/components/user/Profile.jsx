import React, {useEffect} from 'react';
import ProfileSidebar from "./partials/ProfileSidebar.jsx";
import UpdateUserInfos from "./UpdateUserUinfos.jsx";
import {useSelector} from "react-redux";
import {useNavigate} from "react-router-dom";

function Profile(props) {
    const {isLoggedIn} = useSelector(state => state.user)
    const navigate = useNavigate()
    useEffect(() => {
        if (!isLoggedIn) navigate('/login')
    }, [isLoggedIn]);

    return (
        <div className='row my-5'>
            <ProfileSidebar/>
            <UpdateUserInfos profile={true}/>
        </div>
    );
}

export default Profile;