# Fund Wallet Application Database Schema

Welcome to the Fund Wallet Application Database Schema repository. This schema is designed to facilitate the functionality of a fund wallet application, allowing users to manage their funds and transactions seamlessly.

## Tables and Relationships

The database schema consists of several tables and their relationships:

### users

Stores user information and authentication details.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | User's unique identifier              |
| username       | String       | User's username                       |
| email          | String       | User's email address                  |
| password       | String       | Hashed user password                  |
| is_verified    | Boolean      | User's email verification status      |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### currencies

Manages supported currencies.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Currency's unique identifier          |
| currency_code  | String       | Currency code (e.g., USD, EUR)        |
| currency_name  | String       | Full currency name                    |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### transactions

Records user transactions such as deposits, withdrawals, and transfers.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Transaction's unique identifier       |
| user_id        | Foreign Key  | User associated with the transaction  |
| transaction_type | String      | Type of transaction (e.g., Deposit)   |
| amount         | Decimal      | Transaction amount                    |
| currency_id    | Foreign Key  | Currency of the transaction           |
| timestamp      | Timestamp    | Transaction timestamp                 |
| status         | String       | Status of the transaction             |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### transfers

Manages fund transfers between users.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Transfer's unique identifier          |
| sender_id      | Foreign Key  | User sending the funds                |
| receiver_id    | Foreign Key  | User receiving the funds              |
| amount         | Decimal      | Transfer amount                       |
| currency_id    | Foreign Key  | Currency of the transfer              |
| timestamp      | Timestamp    | Transfer timestamp                    |
| status         | String       | Status of the transfer                |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### transaction_categories

Categorizes transactions for insights.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Category's unique identifier          |
| category_name  | String       | Name of the transaction category      |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### transaction_category_mapping

Maps transactions to their respective categories.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| transaction_id | Foreign Key  | Associated transaction's identifier   |
| category_id    | Foreign Key  | Associated category's identifier      |

### transaction_logs

Records log messages related to transactions.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Log entry's unique identifier         |
| transaction_id | Foreign Key  | Associated transaction's identifier   |
| log_message    | String       | Log message text                      |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### notifications

Stores notifications sent to users.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Notification's unique identifier     |
| user_id        | Foreign Key  | User receiving the notification      |
| notification_type | String      | Type of notification                  |
| content        | Text         | Notification content                  |
| timestamp      | Timestamp    | Notification timestamp                |
| is_read        | Boolean      | Notification read status              |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

### security_tokens

Manages tokens for two-factor authentication.

| Column         | Type         | Description                           |
| -------------- | ------------ | ------------------------------------- |
| id             | Primary Key  | Token's unique identifier             |
| user_id        | Foreign Key  | User associated with the token        |
| token_value    | String       | Token value                          |
| expiration_time | Timestamp    | Token expiration timestamp            |
| created_at     | Timestamp    | Creation timestamp                    |
| updated_at     | Timestamp    | Last update timestamp                 |

## Entity Relationships

- A **user** can have multiple **transactions** and **transfers**.
- A **transaction** belongs to a single **user** and has one **currency**.
- A **transfer** involves a sender and a receiver, both linked to **users**, and is associated with a **currency**.
- **Transaction categories** are mapped to **transactions** using the **transaction_category_mapping** table.
- **Notifications** are sent to **users**.
- **Security tokens** are associated with **users** for two-factor authentication.

## Getting Started

1. Clone this repository to your local environment.
2. Configure your Laravel project's database connection settings.
3. Run migrations to create the necessary database tables:

   ```bash
   php artisan migrate
   ```

## Contributions

Contributions to enhance and extend the database schema are encouraged. Please open issues or pull requests for improvements.

## License

This project is licensed under the MIT License. See the [LICENSE](/LICENSE) file for details.

---
