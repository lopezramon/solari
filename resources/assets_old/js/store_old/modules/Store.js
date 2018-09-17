const products = () => [

{
    "product_categories": [
        {
            "id": 1,
            "name": "Pizza"
        },
        {
            "id": 2,
            "name": "No Pizza"
        }
    ],
        "product_subcategories": [
        {
            "id": 1,
            "name": "Especiales",
            "product_category_id": 1
        },
        {
            "id": 2,
            "name": "VIP",
            "product_category_id": 1
        },
        {
            "id": 3,
            "name": "Bebidas",
            "product_category_id": 2
        },
        {
            "id": 4,
            "name": "Postres",
            "product_category_id": 2
        }
    ],
        "products": [
        {
            "id": 1,
            "name": "Margarita",
            "description": "Pizza de margarita",
            "image": "/storage/multimedia/margarita.jpg",
            "additional_category_id": 1,
            "product_feature_id": 1,
            "presentation": [
                {
                    "id": 1,
                    "name": "Mediana",
                    "price": 10,
                    "delivery": true,
                    "max_additionals": 4
                },
                {
                    "id": 2,
                    "name": "Grande",
                    "price": 20,
                    "delivery": true,
                    "max_additionals": 8
                }
            ],
            "product_subcategory_id": 1
        },
        {
            "id": 2,
            "name": "Hawaiana VIP",
            "description": "Pizza Hawaiana VIP",
            "image": "/storage/multimedia/hawaiana.jpg",
            "additional_category_id": 2,
            "product_feature_id": 2,
            "presentation": [
                {
                    "id": 3,
                    "name": "Mediana",
                    "price": 15,
                    "delivery": true,
                    "max_additionals": 5
                },
                {
                    "id": 4,
                    "name": "Grande",
                    "price": 30,
                    "delivery": true,
                    "max_additionals": 10
                }
            ],
            "product_subcategory_id": 2
        }
    ],
        "additional_categories": [
        {
            "id": 1,
            "additionals": [
                {
                    "id": 1,
                    "name": "Maiz",
                    "price": 5
                },
                {
                    "id": 2,
                    "name": "Jamon",
                    "price": 2
                },
                {
                    "id": 3,
                    "name": "Peperoni",
                    "price": 1
                }
            ]
        },
        {
            "id": 2,
            "additionals": [
                {
                    "id": 4,
                    "name": "Mariscos",
                    "price": 2
                },
                {
                    "id": 5,
                    "name": "Champiñones",
                    "price": 3.5
                },
                {
                    "id": 6,
                    "name": "Langosta",
                    "price": 1.99
                }
            ]
        }
    ],
        "product_features": [
        {
            "id": 1,
            "features": [
                {
                    "id": 1,
                    "name": "Masa Fina"
                },
                {
                    "id": 2,
                    "name": "Masa Original"
                }
            ]
        }
    ]
}
];

export default {
    state: {
        store: {
            products: products(),
            filter: {
                query: '',
            }
        }
    },
    actions: {},
    getters: {},
    mutations: {}
}