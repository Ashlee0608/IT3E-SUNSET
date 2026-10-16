<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SunSonSolar is the Power Your Future</title>
    <style>
        body {
            background-color: #fff0f3;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 40px;
            color: #000;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        p {
            color: #333;
            font-size: 14px;
        }
        .section-desc {
            margin-bottom: 25px;
        }
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        .card {
            background-color: #ffe6ed;
            border: 1px solid #ffccd5;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card h3 {
            margin-top: 0;
            font-size: 18px;
        }
        .btn {
            display: inline-block;
            background-color: #ffb3c6;
            color: #000;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            border: 1px solid #ff8fab;
            margin-top: 15px;
            cursor: pointer;
            text-align: center;
        }
        .btn:hover {
            background-color: #ff8fab;
        }
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 40px;
        }
        .action-card {
            background-color: #ffe6ed;
            border: 1px solid #ffccd5;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
        }
        .action-card h3 {
            font-size: 22px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Our Solar Services Section -->
    <h2>Our Solar Services</h2>
    <p class="section-desc">Discover the right solar solution for your home or business.</p>
    
    <div class="grid-3">
        <div class="card">
            <h3>Solar Consultation</h3>
            <p>Get advice about your energy needs and explore suitable solar system options.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
        <div class="card">
            <h3>Solar Installation</h3>
            <p>Explore solar panel installation for residential and business properties.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
        <div class="card">
            <h3>Solar Maintenance</h3>
            <p>Arrange inspections and maintenance to help your solar system perform efficiently.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </div>

    <!-- Benefits of Solar Power Section -->
    <h2>Benefits of Solar Power</h2>
    
    <div class="grid-3">
        <div class="card">
            <h3>Cost Savings</h3>
            <p>Solar energy may help reduce electricity bills depending on your energy usage and system.</p>
        </div>
        <div class="card">
            <h3>Sustainability</h3>
            <p>Solar power uses renewable energy from the sun.</p>
        </div>
        <div class="card">
            <h3>Energy Independence</h3>
            <p>Generate some of your own electricity and reduce dependence on the grid.</p>
        </div>
    </div>

    <!-- Bottom Action Cards (Sign Up & Login) -->
    <div class="grid-2">
        <div class="action-card">
            <h3>Customer Sign Up</h3>
            <a href="registration.php" class="btn">Register Now</a>
        </div>
        <div class="action-card">
            <h3>SunSonSolar Login</h3>
            <a href="login.php" class="btn">Login to Account</a>
        </div>
    </div>

</body>
</html>