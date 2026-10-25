import React from 'react'
import { Bars } from 'react-loader-spinner'
import {BarLoader} from "react-spinners";
export default function Spinner() {
    return (
        <div className='d-flex justify-content-center my-5'>
            <BarLoader
                color="#c96d6d"
                aria-label="bars-loading"
                visible="true"
            />
        </div>
    )
}