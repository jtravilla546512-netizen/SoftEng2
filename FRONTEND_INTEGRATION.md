# Frontend-Backend Integration - Sales Management Dashboard

## ✅ Completed Integration

### Sales Management Dashboard ([dashboard.blade.php](resources/views/admin/dashboard.blade.php))

#### Dynamic Data Loading
**On Page Load:**
- `loadPendingBookings()` - Fetches and displays all pending/assigned bookings from `/api/bookings/pending`
- `loadCompletedBookings()` - Fetches and displays completed transactions from `/api/bookings/completed`

#### Assign Technician Workflow
1. **Load Available Technicians**: When "Assign Tech" clicked, fetches:
   - Booking details from `/api/bookings/{id}`
   - Available technicians filtered by appliance type from `/api/technicians?appliance={type}`
   
2. **Display Tech List**: Dynamically populates modal with:
   - Technician name and status
   - Disabled state for "Off Duty" or "On Job" technicians
   - Only shows techs who can handle the specific appliance

3. **Confirm Assignment**: Calls `/api/bookings/{id}/assign` with:
   - technician_id
   - Validates tech can handle appliance on backend
   - Reloads pending table on success
   - Shows success/error message

#### Complete Job Workflow
1. **Load Available Parts**: When "Complete Job" clicked:
   - Fetches parts from `/api/bookings/{id}/parts`
   - Filters based on service type + appliance combination:
     * Repair/Maintenance + Aircon → Aircon Spare Parts
     * Repair/Maintenance + Refrigerator → Refrigerator Spare Parts
     * Installation + Aircon → Aircon Units
     * Installation + Refrigerator → Refrigerator Units
   
2. **Dynamic Parts List**: 
   - Shows part name, price, and current stock
   - Stock validation on increment (prevents exceeding available quantity)
   - Real-time receipt calculation with parts + labor cost

3. **Generate Receipt**: Calls `/api/bookings/{id}/complete` with:
   - Array of parts: `[{inventory_item_id, quantity}, ...]`
   - Backend validates stock availability
   - Auto-deducts inventory
   - Updates all stats (customer total_spent, tech revenue, inventory levels)
   - Moves booking to Completed Transactions
   - Reloads both tables

#### Key Features
✅ **CSRF Protection**: Meta tag added for secure API calls
✅ **Error Handling**: Try-catch blocks with user-friendly alerts
✅ **Real-time Updates**: Tables refresh after assign/complete operations
✅ **Stock Validation**: Prevents completing jobs without sufficient inventory
✅ **Automatic Calculations**: Labor cost fetched from database, parts subtotal computed dynamically
✅ **Smart Tech Filtering**: Only shows technicians who can handle specific appliance types
✅ **Status Tracking**: Visual indicators for assigned vs unassigned bookings

## 🔄 Workflow Example

### Booking Lifecycle in Dashboard:
1. **New booking appears** in Pending Bookings (via customer form submission)
2. **Admin assigns technician** → Status changes from "Unassigned" to "Assigned" with tech name badge
3. **Technician performs service** (offline)
4. **Admin completes job** → Records parts used → Generates receipt
5. **Booking moves** to Completed Transactions tab
6. **Inventory auto-deducts** → Stock levels updated
7. **Stats auto-update** → Customer total_spent, technician revenue, booking counts

## 📊 Data Flow

### API Endpoints Used:
```
GET  /api/bookings/pending          → Load pending table
GET  /api/bookings/completed        → Load completed table
GET  /api/bookings/{id}             → Get booking details
GET  /api/technicians?appliance=X   → Get filtered techs
POST /api/bookings/{id}/assign      → Assign technician
GET  /api/bookings/{id}/parts       → Get available parts
POST /api/bookings/{id}/complete    → Complete job
```

### Request/Response Examples:

**Assign Technician:**
```javascript
POST /api/bookings/5/assign
Body: { "technician_id": 3 }

Response: {
  "success": true,
  "message": "Technician assigned successfully",
  "booking": { id, booking_number, technician: {...}, ... }
}
```

**Complete Job:**
```javascript
POST /api/bookings/5/complete
Body: {
  "parts": [
    { "inventory_item_id": 2, "quantity": 1 },
    { "inventory_item_id": 5, "quantity": 2 }
  ]
}

Response: {
  "success": true,
  "message": "Booking completed successfully",
  "booking": { 
    id, total_amount, bookingParts: [...], 
    customer: {...}, technician: {...} 
  }
}
```

## 🎯 Next Steps

### Remaining Views to Integrate:
1. **index.blade.php** (Customer Booking Form)
   - Submit to `/api/bookings` (POST)
   - Redirect to success page on completion

2. **inventory.blade.php** (Inventory Management)
   - Load items from `/api/inventory`
   - Add stock via `/api/inventory/{id}/add-stock`
   - Get low stock alerts from `/api/inventory/low-stock`

3. **customers.blade.php** (Customer List)
   - Load from `/api/customers`
   - View profile from `/api/customers/{id}`

4. **technicians.blade.php** (Technician Management)
   - Load from `/api/technicians`
   - Add/edit techs via API

5. **reports.blade.php** (Analytics Dashboard)
   - Load stats from `/api/reports/overall`
   - Revenue charts from `/api/reports/revenue`

6. **settings.blade.php** (Labor Costs)
   - Load costs from `/api/settings/labor-costs`
   - Update via `/api/settings/labor-costs/{id}`

## 🔍 Testing Checklist

- [ ] Load dashboard → verify pending bookings appear
- [ ] Assign technician → verify badge updates and dropdown changes
- [ ] Change assigned technician → verify reassignment works
- [ ] Complete job with parts → verify receipt calculation
- [ ] Complete job → verify booking moves to completed tab
- [ ] Complete job → verify inventory deducted
- [ ] Try completing job with insufficient stock → verify error message
- [ ] Try assigning tech to wrong appliance type → verify validation
- [ ] Reload page → verify data persists from database

## 📝 Notes

- All JavaScript functions are async/await for cleaner error handling
- CSRF token automatically included in fetch requests
- Tables dynamically built from API data (no hardcoded rows)
- Real-time validation prevents invalid operations
- User feedback via alerts (can be upgraded to toast notifications)
- Database transactions ensure data integrity during complex operations
