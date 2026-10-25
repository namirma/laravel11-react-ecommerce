import React from 'react';

function PageNotFound(props) {
    return (
        <div className='row my-5'>
            <div className="col-md-6 mx-auto">
                <div className="card">
                    <div className="card-body">
                        <h6 className="text-center">
                            404 Page Not Found
                        </h6>
                        <Link to='/' className='btn btn-outline-secondary'>
                            Back Home
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default PageNotFound;