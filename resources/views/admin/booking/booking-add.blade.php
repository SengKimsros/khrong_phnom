@extends('../layouts.app')
@section('content')
<div class="page-wrapper">
    <!-- ===== Page-Container ===== -->
    <div class="container-fluid">
        <div class="page-wrapper" style="min-height: 525px;">
            <div class="container-fluid">
                <h1>Add Booking</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/admin/booking" method="POST">
                    @csrf
                    <input type="number" name="home_id" placeholder="home_id">
                    <input type="text" name="first_name" placeholder="first_name">
                    <input type="text" name="last_name" placeholder="last_name">
                    <input type="text" name="phone" placeholder="phone">
                    <input type="text" name="email" placeholder="email">
                    <input type="number" name="service_id" placeholder="service_id">
                    <input type="number" name="amount" placeholder="amount">
                    <input type="text" name="address" placeholder="address">
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <!-- ===== Page-Container-End ===== -->
    <footer class="footer t-a-c">
        © 2017 Cubic Admin
    </footer>
</div>
@endsection
