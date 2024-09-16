
# Tasks for Laravel Interview

This is a Laravel app to manage products and categories. It includes sorting products by best selling, top-rated, and price.

## Features

- Sort products by:
  - **Best Sell**: Based on the number of orders.
  - **Top Rated**: Based on product reviews.
  - **Price**: Sort from high to low or low to high.

## Models

- **Product**: `id`, `name`, `slug`, `price`
- **Category**: `id`, `name`, `slug`, `parent_id`
- **ProductCategory**: `product_id`, `category_id`
- **Order**: `id`, `grand_total`, `shipping_cost`, `discount`, `user_id`
- **OrderDetail**: `id`, `product_id`, `order_id`, `unit_price`, `quantity`
- **ProductReview**: `id`, `product_id`, `user_id`, `comment`, `rating`

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Monarul007/beautyBooth.git
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up `.env`:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

5. Start the server:
   ```bash
   php artisan serve
   ```

## API

**Endpoint**: `/category/{slug}/products`

**Method**: `GET`

**Sort Options**:
- `?sort=best_sell`
- `?sort=top_rated`
- `?sort=price_high_to_low`
- `?sort=price_low_to_high`

Example: `/category/electronics/products?sort=best_sell`

## Seeder

Seeder uses Laravel factories to add random products, categories, and reviews efficiently.
