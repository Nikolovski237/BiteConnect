<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <p>Welcome to the dashboard, {{ Auth::user()->name }}!</p>

                        {{-- Add your dashboard content here --}}
                        {{-- For example, display different content based on the user's role --}}
                        @if(Auth::user()->role === 'master_admin')
                            <p>You are a master admin.</p>
                            {{-- Add master admin specific content --}}
                        @elseif(Auth::user()->role === 'restaurant_admin')
                            <p>You are a restaurant admin.</p>
                            {{-- Add restaurant admin specific content --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>