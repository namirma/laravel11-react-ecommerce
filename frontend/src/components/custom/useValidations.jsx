import React from 'react';

function UseValidations(errors, field) {
    const renderError = (field) => (
        errors?.[field]?.map((error, index) => (
            <div key={index} className="text-white my-2 rounded p-2 bg-danger">
                {error}
            </div>
        ))
    )
    return renderError(
        field
    );
}

export default UseValidations;