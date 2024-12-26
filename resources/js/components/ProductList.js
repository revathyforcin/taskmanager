import React, { useEffect, useState } from 'react';
import axios from 'axios';
import './ProductList.css';

const ProductList = () => {
    const [products, setProducts] = useState([]);

    useEffect(() => {
        // Fetch products from the backend (Laravel API)
        axios.get('/api/products')
            .then(response => {
                setProducts(response.data);
            })
            .catch(error => {
                console.error('There was an error fetching the products!', error);
            });
    }, []);

    return (
        <div className="product-list">
            <h2>Our Products</h2>
            <div className="product-grid">
                {products.length === 0 ? (
                    <p>No products available.</p>
                ) : (
                    products.map(product => (
                        <div key={product.id} className="product-card">
                            <img src={`/storage/${product.image}`} alt={product.name} />
                            <h3>{product.name}</h3>
                            <p>{product.detail}</p>
                            <p><strong>${product.price}</strong></p>
                        </div>
                    ))
                )}
            </div>
        </div>
    );
};

export default ProductList;
