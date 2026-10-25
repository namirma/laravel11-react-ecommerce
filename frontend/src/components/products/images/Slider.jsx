import React, { useEffect, useState } from 'react'
import ImageGallery from "react-image-gallery"

export default function Slider({product}) {
    const [images, setImages] = useState([])
    const [loaded, setLoaded] = useState(false)

    useEffect(() => {
        handleProductImages()
    }, [])

    const handleProductImages = () => {
        let updatedImages = [
            {
                original: product?.thumbnail,
                thumbnail: product?.thumbnail,
                originalHeight: 10
            }
        ]


        setImages(updatedImages)
        setLoaded(true)
    }

    return (
        <ImageGallery
            showPlayButton={loaded}
            showFullscreenButton={loaded}
            items={images} />
    )
}