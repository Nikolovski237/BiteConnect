<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h2>All Restaurants</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Cost</th>
            </tr>
        </thead>
        <tbody>
            @forelse($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->description ?: 'N/A' }}</td>
                    <td>{{ $restaurant->location ?: 'N/A' }}</td>
                    <td>{{ $restaurant->cost ?: 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No restaurants available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>