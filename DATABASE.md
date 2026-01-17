# CoolSystem Spec Admin - Database Documentation

## Overview
This document provides a comprehensive overview of the database schema for the CoolSystem Spec Admin application, which manages bookings, inventory, technicians, and customers for an aircon and refrigerator repair service business.

**Database Name:** `softeng2_db`  
**Database Type:** MySQL  
**Last Updated:** January 17, 2026

---

## Table of Contents
1. [Entity Relationship Diagram](#entity-relationship-diagram)
2. [Core Tables](#core-tables)
3. [Support Tables](#support-tables)
4. [Relationships](#relationships)
5. [Indexes](#indexes)

---

## Entity Relationship Diagram

```
┌─────────────┐         ┌─────────────┐         ┌─────────────┐
│  Customers  │────────>│  Bookings   │<────────│ Technicians │
└─────────────┘         └─────────────┘         └─────────────┘
                              │  │
                              │  │
                    ┌─────────┘  └─────────┐
                    │                       │
                    v                       v
          ┌──────────────────┐    ┌─────────────────┐
          │  Booking_Parts   │───>│ Inventory_Items │
          └──────────────────┘    └─────────────────┘
                                           │
                                           v
                                  ┌──────────────────┐
                                  │ Stock_Movements  │
                                  └──────────────────┘

┌─────────────┐
│ Labor_Costs │  (Configuration Table)
└─────────────┘

┌─────────────┐
│    Users    │  (Authentication)
└─────────────┘
```

---

## Core Tables

### 1. **customers**
Stores customer information and booking history.

| Column Name     | Data Type       | Constraints          | Description                          |
|-----------------|-----------------|----------------------|--------------------------------------|
| id              | BIGINT UNSIGNED | PRIMARY KEY, AUTO    | Unique customer identifier           |
| name            | VARCHAR(255)    | NOT NULL, INDEXED    | Customer full name                   |
| phone           | VARCHAR(20)     | NOT NULL, INDEXED    | Contact phone number                 |
| address         | TEXT            | NOT NULL             | Customer address                     |
| customer_since  | DATE            | NULLABLE             | Registration date                    |
| total_bookings  | INTEGER         | DEFAULT 0            | Total number of bookings made        |
| total_spent     | DECIMAL(10,2)   | DEFAULT 0.00         | Lifetime spending amount             |
| created_at      | TIMESTAMP       | AUTO                 | Record creation timestamp            |
| updated_at      | TIMESTAMP       | AUTO                 | Record update timestamp              |

**Indexes:**
- `customers_name_index` on `name`
- `customers_phone_index` on `phone`

**Relationships:**
- **One-to-Many** with `bookings` (One customer can have many bookings)

---

### 2. **technicians**
Stores technician information, skills, and performance metrics.

| Column Name      | Data Type       | Constraints                    | Description                          |
|------------------|-----------------|--------------------------------|--------------------------------------|
| id               | BIGINT UNSIGNED | PRIMARY KEY, AUTO              | Unique technician identifier         |
| name             | VARCHAR(255)    | NOT NULL, INDEXED              | Technician full name                 |
| phone            | VARCHAR(20)     | NOT NULL                       | Contact phone number                 |
| email            | VARCHAR(255)    | NULLABLE                       | Email address                        |
| address          | TEXT            | NOT NULL                       | Technician address                   |
| specializations  | JSON            | NOT NULL                       | Skills array ['Aircon', 'Refrigerator'] |
| status           | ENUM            | NOT NULL, DEFAULT 'Available'  | 'Available', 'Off Duty', 'On Job'    |
| jobs_completed   | INTEGER         | DEFAULT 0                      | Total completed jobs                 |
| active_jobs      | INTEGER         | DEFAULT 0                      | Current active job count             |
| average_rating   | DECIMAL(3,2)    | DEFAULT 0.00                   | Average customer rating (0-5.00)     |
| total_revenue    | DECIMAL(10,2)   | DEFAULT 0.00                   | Total revenue generated              |
| date_hired       | DATE            | NOT NULL                       | Employment start date                |
| created_at       | TIMESTAMP       | AUTO                           | Record creation timestamp            |
| updated_at       | TIMESTAMP       | AUTO                           | Record update timestamp              |

**Indexes:**
- `technicians_name_index` on `name`
- `technicians_status_index` on `status`

**Relationships:**
- **One-to-Many** with `bookings` (One technician can handle many bookings)

---

### 3. **bookings**
Central table managing service bookings and job orders.

| Column Name          | Data Type       | Constraints                  | Description                          |
|----------------------|-----------------|------------------------------|--------------------------------------|
| id                   | BIGINT UNSIGNED | PRIMARY KEY, AUTO            | Unique booking identifier            |
| booking_number       | VARCHAR(20)     | UNIQUE, INDEXED              | Human-readable booking reference     |
| customer_id          | BIGINT UNSIGNED | FOREIGN KEY, INDEXED         | Reference to customers table         |
| technician_id        | BIGINT UNSIGNED | FOREIGN KEY, NULLABLE, INDEXED | Reference to technicians table    |
| appliance            | ENUM            | NOT NULL                     | 'Aircon', 'Refrigerator'             |
| service_type         | ENUM            | NOT NULL                     | 'Repair', 'Installation', 'Maintenance' |
| issue_description    | TEXT            | NULLABLE                     | Customer's problem description       |
| location             | VARCHAR(255)    | NOT NULL                     | Service location address             |
| service_date         | DATE            | NOT NULL, INDEXED            | Scheduled service date               |
| service_time         | TIME            | NOT NULL                     | Scheduled service time               |
| status               | ENUM            | DEFAULT 'Pending', INDEXED   | 'Pending', 'Assigned', 'Completed', 'Cancelled' |
| labor_cost           | DECIMAL(8,2)    | DEFAULT 0.00                 | Service labor charge                 |
| parts_cost           | DECIMAL(10,2)   | DEFAULT 0.00                 | Total parts cost                     |
| total_amount         | DECIMAL(10,2)   | DEFAULT 0.00                 | Grand total (labor + parts)          |
| assigned_at          | TIMESTAMP       | NULLABLE                     | Technician assignment timestamp      |
| completed_at         | TIMESTAMP       | NULLABLE                     | Job completion timestamp             |
| cancellation_reason  | VARCHAR(255)    | NULLABLE                     | Reason for cancellation              |
| cancelled_at         | TIMESTAMP       | NULLABLE                     | Cancellation timestamp               |
| created_at           | TIMESTAMP       | AUTO                         | Record creation timestamp            |
| updated_at           | TIMESTAMP       | AUTO                         | Record update timestamp              |

**Indexes:**
- `bookings_booking_number_index` on `booking_number`
- `bookings_status_index` on `status`
- `bookings_service_date_index` on `service_date`
- `bookings_customer_id_index` on `customer_id`
- `bookings_technician_id_index` on `technician_id`

**Foreign Key Constraints:**
- `customer_id` → `customers.id` (CASCADE on delete)
- `technician_id` → `technicians.id` (SET NULL on delete)

**Relationships:**
- **Many-to-One** with `customers`
- **Many-to-One** with `technicians`
- **One-to-Many** with `booking_parts`
- **One-to-Many** with `stock_movements`

---

### 4. **inventory_items**
Manages spare parts and unit inventory.

| Column Name     | Data Type       | Constraints                    | Description                          |
|-----------------|-----------------|--------------------------------|--------------------------------------|
| id              | BIGINT UNSIGNED | PRIMARY KEY, AUTO              | Unique item identifier               |
| item_code       | VARCHAR(50)     | UNIQUE, INDEXED                | SKU/Item code                        |
| name            | VARCHAR(255)    | NOT NULL                       | Item name                            |
| brand           | VARCHAR(255)    | NULLABLE                       | Product brand                        |
| image           | VARCHAR(255)    | NULLABLE                       | Image file path                      |
| category        | ENUM            | NOT NULL, INDEXED              | 'Aircon Unit', 'Aircon Spare Parts', 'Refrigerator Unit', 'Refrigerator Spare Parts' |
| description     | TEXT            | NULLABLE                       | Item description                     |
| quantity        | INTEGER         | DEFAULT 0                      | Current stock quantity               |
| reorder_point   | INTEGER         | DEFAULT 5                      | Low stock threshold                  |
| cost_price      | DECIMAL(10,2)   | NOT NULL                       | Purchase/acquisition cost            |
| selling_price   | DECIMAL(10,2)   | NOT NULL                       | Selling price to customer            |
| status          | ENUM            | DEFAULT 'In Stock', INDEXED    | 'In Stock', 'Low Stock', 'Out of Stock' |
| created_at      | TIMESTAMP       | AUTO                           | Record creation timestamp            |
| updated_at      | TIMESTAMP       | AUTO                           | Record update timestamp              |

**Indexes:**
- `inventory_items_item_code_index` on `item_code`
- `inventory_items_category_index` on `category`
- `inventory_items_status_index` on `status`

**Relationships:**
- **One-to-Many** with `booking_parts`
- **One-to-Many** with `stock_movements`

---

### 5. **booking_parts**
Junction table linking bookings to inventory items (parts used in service).

| Column Name       | Data Type       | Constraints              | Description                          |
|-------------------|-----------------|--------------------------|--------------------------------------|
| id                | BIGINT UNSIGNED | PRIMARY KEY, AUTO        | Unique record identifier             |
| booking_id        | BIGINT UNSIGNED | FOREIGN KEY, INDEXED     | Reference to bookings table          |
| inventory_item_id | BIGINT UNSIGNED | FOREIGN KEY, INDEXED     | Reference to inventory_items table   |
| quantity          | INTEGER         | NOT NULL                 | Quantity of item used                |
| unit_price        | DECIMAL(10,2)   | NOT NULL                 | Price per unit at time of use        |
| subtotal          | DECIMAL(10,2)   | NOT NULL                 | quantity × unit_price                |
| created_at        | TIMESTAMP       | AUTO                     | Record creation timestamp            |
| updated_at        | TIMESTAMP       | AUTO                     | Record update timestamp              |

**Indexes:**
- `booking_parts_booking_id_index` on `booking_id`
- `booking_parts_inventory_item_id_index` on `inventory_item_id`

**Foreign Key Constraints:**
- `booking_id` → `bookings.id` (CASCADE on delete)
- `inventory_item_id` → `inventory_items.id` (RESTRICT on delete)

**Relationships:**
- **Many-to-One** with `bookings`
- **Many-to-One** with `inventory_items`

---

## Support Tables

### 6. **stock_movements**
Audit trail for all inventory stock changes.

| Column Name       | Data Type       | Constraints              | Description                          |
|-------------------|-----------------|--------------------------|--------------------------------------|
| id                | BIGINT UNSIGNED | PRIMARY KEY, AUTO        | Unique movement identifier           |
| inventory_item_id | BIGINT UNSIGNED | FOREIGN KEY, INDEXED     | Reference to inventory_items table   |
| booking_id        | BIGINT UNSIGNED | FOREIGN KEY, NULLABLE, INDEXED | Reference to related booking    |
| type              | ENUM            | NOT NULL, INDEXED        | 'Stock In', 'Stock Out', 'Adjustment' |
| quantity          | INTEGER         | NOT NULL                 | Quantity changed (+/-)               |
| previous_stock    | INTEGER         | NOT NULL                 | Stock level before movement          |
| new_stock         | INTEGER         | NOT NULL                 | Stock level after movement           |
| reason            | TEXT            | NULLABLE                 | Explanation for movement             |
| performed_by      | VARCHAR(255)    | DEFAULT 'Admin User'     | User who performed action            |
| created_at        | TIMESTAMP       | AUTO                     | Movement timestamp                   |
| updated_at        | TIMESTAMP       | AUTO                     | Record update timestamp              |

**Indexes:**
- `stock_movements_inventory_item_id_index` on `inventory_item_id`
- `stock_movements_booking_id_index` on `booking_id`
- `stock_movements_type_index` on `type`

**Foreign Key Constraints:**
- `inventory_item_id` → `inventory_items.id` (CASCADE on delete)
- `booking_id` → `bookings.id` (SET NULL on delete)

---

### 7. **labor_costs**
Configuration table for service labor pricing.

| Column Name    | Data Type       | Constraints              | Description                          |
|----------------|-----------------|--------------------------|--------------------------------------|
| id             | BIGINT UNSIGNED | PRIMARY KEY, AUTO        | Unique record identifier             |
| service_type   | ENUM            | NOT NULL, INDEXED        | 'Repair', 'Installation', 'Maintenance' |
| cost           | DECIMAL(8,2)    | NOT NULL                 | Current labor cost                   |
| previous_cost  | DECIMAL(8,2)    | NULLABLE                 | Previous cost (for audit)            |
| effective_date | DATETIME        | NOT NULL, INDEXED        | When this price became effective     |
| modified_by    | VARCHAR(255)    | DEFAULT 'Admin User'     | User who set this price              |
| created_at     | TIMESTAMP       | AUTO                     | Record creation timestamp            |
| updated_at     | TIMESTAMP       | AUTO                     | Record update timestamp              |

**Indexes:**
- `labor_costs_service_type_index` on `service_type`
- `labor_costs_effective_date_index` on `effective_date`

**Note:** This table stores pricing configuration. Each service type should have one active record.

---

### 8. **users**
Authentication table for admin users.

| Column Name        | Data Type       | Constraints              | Description                          |
|--------------------|-----------------|--------------------------|--------------------------------------|
| id                 | BIGINT UNSIGNED | PRIMARY KEY, AUTO        | Unique user identifier               |
| name               | VARCHAR(255)    | NOT NULL                 | User full name                       |
| email              | VARCHAR(255)    | UNIQUE                   | Login email address                  |
| email_verified_at  | TIMESTAMP       | NULLABLE                 | Email verification timestamp         |
| password           | VARCHAR(255)    | NOT NULL                 | Hashed password                      |
| remember_token     | VARCHAR(100)    | NULLABLE                 | Remember me token                    |
| created_at         | TIMESTAMP       | AUTO                     | Account creation timestamp           |
| updated_at         | TIMESTAMP       | AUTO                     | Account update timestamp             |

**Related Tables:**
- `password_reset_tokens` - Password reset functionality
- `sessions` - User session management

---

## Relationships

### Primary Relationships

1. **Customer → Bookings (One-to-Many)**
   - A customer can have multiple bookings
   - Each booking belongs to one customer
   - Cascade delete: deleting a customer removes all their bookings

2. **Technician → Bookings (One-to-Many)**
   - A technician can be assigned to multiple bookings
   - Each booking can be assigned to one technician (or none)
   - Set null on delete: deleting a technician keeps booking but removes assignment

3. **Booking → Booking_Parts (One-to-Many)**
   - A booking can use multiple parts
   - Each booking_part record belongs to one booking
   - Cascade delete: deleting a booking removes all associated parts records

4. **Inventory_Item → Booking_Parts (One-to-Many)**
   - An inventory item can be used in multiple bookings
   - Each booking_part references one inventory item
   - Restrict delete: cannot delete item if used in bookings

5. **Inventory_Item → Stock_Movements (One-to-Many)**
   - An inventory item has many stock movement records
   - Each movement tracks changes for one item
   - Cascade delete: deleting an item removes its movement history

6. **Booking → Stock_Movements (One-to-Many)**
   - A booking can trigger multiple stock movements (one per part used)
   - Set null on delete: deleting a booking keeps movement history but removes reference

---

## Indexes

### Performance Optimization
The database uses strategic indexing for frequently queried columns:

**Search Indexes:**
- Customer name and phone (for customer lookup)
- Technician name and status (for assignment queries)
- Booking number, status, and service date (for booking management)
- Inventory item code, category, and status (for inventory management)

**Foreign Key Indexes:**
- All foreign key columns are indexed for join performance
- Composite indexes on date ranges for reporting queries

**Business Logic Indexes:**
- Service types and dates for pricing and scheduling
- Stock movement types for inventory auditing

---

## Data Integrity Rules

### Cascade Behaviors

**CASCADE DELETE:**
- `customers` → `bookings` (Customer removal cleans up their bookings)
- `bookings` → `booking_parts` (Booking deletion removes parts records)
- `inventory_items` → `stock_movements` (Item deletion clears movement history)

**SET NULL:**
- `technicians` → `bookings` (Technician removal preserves booking history)
- `bookings` → `stock_movements` (Booking removal preserves inventory audit)

**RESTRICT:**
- `inventory_items` → `booking_parts` (Cannot delete items used in bookings)

### Business Rules

1. **Booking Status Flow:** Pending → Assigned → Completed/Cancelled
2. **Stock Status:** Auto-calculated based on quantity vs reorder_point
3. **Technician Status:** Managed by active_jobs counter
4. **Price Consistency:** Booking parts record price at time of service

---

## Sample Queries

### Get Customer Booking History
```sql
SELECT b.*, t.name as technician_name
FROM bookings b
LEFT JOIN technicians t ON b.technician_id = t.id
WHERE b.customer_id = ? AND b.status = 'Completed'
ORDER BY b.completed_at DESC;
```

### Calculate Technician Performance
```sql
SELECT t.name, 
       COUNT(b.id) as jobs_completed,
       SUM(b.total_amount) as revenue_generated
FROM technicians t
JOIN bookings b ON t.id = b.technician_id
WHERE b.status = 'Completed'
GROUP BY t.id
ORDER BY revenue_generated DESC;
```

### Track Most Used Parts
```sql
SELECT i.name, i.item_code,
       SUM(bp.quantity) as total_used,
       COUNT(DISTINCT bp.booking_id) as bookings_count
FROM inventory_items i
JOIN booking_parts bp ON i.id = bp.inventory_item_id
JOIN bookings b ON bp.booking_id = b.id
WHERE b.status = 'Completed'
GROUP BY i.id
ORDER BY total_used DESC;
```

### Monthly Revenue Report
```sql
SELECT 
    DATE_FORMAT(completed_at, '%Y-%m') as month,
    COUNT(*) as completed_bookings,
    SUM(total_amount) as revenue
FROM bookings
WHERE status = 'Completed'
GROUP BY DATE_FORMAT(completed_at, '%Y-%m')
ORDER BY month DESC;
```

---

## Maintenance Notes

### Regular Maintenance Tasks

1. **Stock Level Updates:**
   - Automatically recalculated on booking_parts creation
   - Stock movements logged for audit trail

2. **Status Updates:**
   - Inventory status updated based on quantity thresholds
   - Technician status updated based on active_jobs counter
   - Booking status requires manual workflow progression

3. **Aggregated Fields:**
   - Customer total_bookings and total_spent updated on booking completion
   - Technician jobs_completed and total_revenue updated on booking completion

### Database Version History

- **v1.0** (January 16, 2026): Initial schema creation
- **v1.1** (January 17, 2026): Added cancellation fields to bookings
- **v1.2** (January 17, 2026): Changed labor_costs.effective_date to DATETIME

---

## Contact & Support

For database-related questions or schema modifications, contact the development team.

**Project:** CoolSystem Spec Admin  
**Database Version:** 1.2  
**Last Schema Update:** January 17, 2026
