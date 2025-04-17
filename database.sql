-- Create the users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    email VARCHAR(100) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the order_items table
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

-- Insert sample data into the products table
INSERT INTO products (name, price, description, image) VALUES
('Stylish Shoes', 37.00, 'Trendy and comfy shoes, ideal for casual and formal wear.', 'shoes.webp'),
('Elegant Accessories', 15.00, 'Accessories that complete your look with finesse and charm.', 'access.webp'),
('SunGuard Shades', 10.00, 'Classic sunglasses to protect your eyes & elevate your style.', 'sunglasses1.jpg'),
('Fashion Bag', 20.00, 'Minimalist leather bag for your essentials with classy touch.', 'na2.png'),
('White T-Shirt', 12.00, 'Soft cotton regular fit t-shirt for everyday comfort.', 'na1.png');
