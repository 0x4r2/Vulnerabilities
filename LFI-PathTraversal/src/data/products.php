<?php

function getProducts() {
    return [
        [
            'id' => 1,
            'name' => 'Coastal Horizon Canvas',
            'price' => 89.99,
            'category' => 'Wall Art',
            'image' => 'product1.jpg',
            'description' => 'A serene coastal horizon rendered on gallery-wrapped canvas. Hand-stretched over a solid wood frame and finished with a UV-protective coating to keep colors vibrant for years.',
        ],
        [
            'id' => 2,
            'name' => 'Amber Woodland Print',
            'price' => 64.50,
            'category' => 'Photography Prints',
            'image' => 'product2.jpg',
            'description' => 'A warm, golden-hour photograph of a quiet woodland trail. Printed on archival matte paper using pigment-based inks for a long-lasting, fade-resistant finish.',
        ],
        [
            'id' => 3,
            'name' => 'Nordic Oak Frame Set',
            'price' => 42.00,
            'category' => 'Frames',
            'image' => 'product3.jpg',
            'description' => 'A set of three minimalist oak frames, perfect for building a curated gallery wall. Includes mounting hardware and anti-glare glass.',
        ],
        [
            'id' => 4,
            'name' => 'Terracotta Vase Trio',
            'price' => 55.00,
            'category' => 'Home Decor',
            'image' => 'product4.jpg',
            'description' => 'Three hand-thrown terracotta vases in varying heights, ideal for dried florals or as standalone sculptural pieces on a shelf or mantel.',
        ],
        [
            'id' => 5,
            'name' => 'Midnight Skyline Print',
            'price' => 74.99,
            'category' => 'Photography Prints',
            'image' => 'product5.jpg',
            'description' => 'A striking long-exposure city skyline at night, capturing streaking lights against a deep blue sky. Available unframed on premium luster paper.',
        ],
        [
            'id' => 6,
            'name' => 'Woven Rattan Wall Mirror',
            'price' => 98.00,
            'category' => 'Home Decor',
            'image' => 'product6.jpg',
            'description' => 'A round wall mirror framed in hand-woven rattan, bringing warm, natural texture to any entryway or living space.',
        ],
        [
            'id' => 7,
            'name' => 'Desert Bloom Canvas',
            'price' => 92.25,
            'category' => 'Wall Art',
            'image' => 'product7.jpg',
            'description' => 'Bold desert flora captured in rich earth tones, printed on textured canvas and ready to hang straight out of the box.',
        ],
        [
            'id' => 8,
            'name' => 'Brushed Brass Frame',
            'price' => 28.75,
            'category' => 'Frames',
            'image' => 'product8.jpg',
            'description' => 'A slim brushed-brass frame with a soft antique finish, designed to complement both modern and vintage interiors.',
        ],
        [
            'id' => 9,
            'name' => 'Misty Mountain Print',
            'price' => 69.00,
            'category' => 'Photography Prints',
            'image' => 'product9.jpg',
            'description' => 'Layers of fog rolling over distant peaks at dawn. A calm, atmospheric piece printed on fine-art matte stock.',
        ],
        [
            'id' => 10,
            'name' => 'Ceramic Table Sculpture',
            'price' => 47.50,
            'category' => 'Home Decor',
            'image' => 'product10.jpg',
            'description' => 'A hand-glazed ceramic sculpture with an organic, flowing form. A quiet statement piece for a console table or bookshelf.',
        ],
    ];
}

function getProductById($id) {
    foreach (getProducts() as $product) {
        if ((int) $product['id'] === (int) $id) {
            return $product;
        }
    }
    return null;
}
