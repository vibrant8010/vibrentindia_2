<!DOCTYPE html>
<html>
<head>
    <title>New Inquiry Received</title>
</head>
<body>
    <h1>New Inquiry Details</h1>
    <p><strong>Product Code:</strong> {{ $inquiryData['product_id'] }}</p>
    <p><strong>Product Name:</strong> {{ $inquiryData['product_name'] }}</p>
    <p><strong>Company Name:</strong> {{ $inquiryData['companyname'] ?? 'N/A' }}</p>
    <p><strong>Name:</strong> {{ $inquiryData['name'] }}</p>
    <p><strong>Email:</strong> {{ $inquiryData['email'] }}</p>
    <p><strong>Phone:</strong> {{ $inquiryData['phone'] ?? 'N/A' }}</p>
    <p><strong>Quantity:</strong> {{ $inquiryData['quantity'] }}</p>
    <p><strong>Message:</strong> {{ $inquiryData['message'] ?? 'N/A' }}</p>
</body>
</html>
