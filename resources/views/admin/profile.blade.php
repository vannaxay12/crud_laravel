@if (isset($admin) && $admin)
    <div class="row">
        <div class="col-md-6">
            <label class="labels">Current Profile Image</label>
            @if ($admin->profile_image)
                <img src="{{ Storage::url($admin->profile_image) }}" alt="Profile Image" class="img-thumbnail" width="150">
            @else
                <p>No image uploaded</p>
            @endif
        </div>
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            max-width: 300px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .profile-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-card h3 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .profile-card p {
            margin: 5px 0;
            color: #555;
        }

        .profile-card .social-links a {
            margin: 0 5px;
            color: #333;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .profile-card .social-links a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <img src="https://via.placeholder.com/100" alt="Profile Image">
        <h3>Eleanor Pena</h3>
        <p>@eleanorpena</p>
        <p>Creator of minimalistic & bold graphics and digital artwork.</p>
        <p>Artist/Creative Director by Day</p>
        <p>#NFT minting with passion</p>
        <div class="social-links">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>
    </div><form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('POST')
    
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
        </div>
    
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $admin->phone) }}">
        </div>
    
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $admin->country) }}">
        </div>
    
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $admin->city) }}">
        </div>
    
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
    


    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>