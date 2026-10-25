import React from 'react';
import ProductListItem from "./ProductListItem.jsx";

function ProductList({products}) {
    return (
        <div className='row my-5'>
            {
                products?.map(product => (
                    <ProductListItem product={product}
                                     key={product.id}/>
                ))
            }
        </div>
    );
}

export default ProductList;