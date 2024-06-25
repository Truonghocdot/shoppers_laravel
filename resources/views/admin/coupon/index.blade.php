@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <h4 class="d-inline">Coupon of web </h4>
                <p class="text-muted">This is coupon of daily day</p>
                <p class="text-muted">This is coupon will be auto open in 5 minute after 00:AM. And auto destroy its self
                    after 5 minute!</p>
                <div class="row">
                    @if (count($daily) > 0)
                        @foreach ($daily as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->content }}</h5>
                                        <img style="width: 180px;" src="/images/{{ $item->thumbnail }}" alt="">
                                        <div class="d-flex justify-content-between mt-3">
                                            <h6>Value: {{ $item->value }}%</h6>
                                            <h6>Count: {{ $item->count }}</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">
                                            <small id="time-left" class="text-muted d-inline-block"></small>
                                            <a href="{{ route('admin.coupon.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger ">Delete</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>Have not any coupon in this day! Please create new coupon.</h2>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Daily Coupon</h4>
                        <div class="basic-form">
                            <form method="POST" action="{{ route('admin.coupon.newdaily') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Content of coupon</label>
                                    <input type="text" name="content" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Percentage Of Promotion:</label>
                                    <input type="number" value="0" class="form-control" required name="percent"
                                        min="1" max="100" placeholder="Price ">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="count" placeholder="Count" required
                                        min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <p class="text-muted">This is coupon for you management</p>
                <div class="row">
                    @if (count($byUser) > 0)
                        @foreach ($byUser as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <img class="img-fluid" src="images" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->content }}</h5>
                                        <img style="width: 180px;" src="/images/{{ $item->thumbnail }}" alt="">
                                        <div class="d-flex justify-content-between mt-3">
                                            <h6>Value: {{ $item->value }}%</h6>
                                            <h6>Count: {{ $item->count }}</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">
                                            <a href="{{ route('admin.coupon.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger ">Delete</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>Have not any coupon! Please create new coupon.</h2>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Coupon</h4>
                        <div class="basic-form">
                            <form method="POST" action="{{ route('admin.coupon.byuser') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Content of coupon</label>
                                    <input type="text" name="content" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Percentage Of Promotion:</label>
                                    <input type="number" value="0" class="form-control" required name="percent"
                                        min="1" max="100" placeholder="Price ">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="count" placeholder="Count" required
                                        min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var time_left = document.querySelectorAll('#time-left');
        let D = new Date();
        console.log(time_left);
        time_left.forEach(element => {
            let time = 'h-' + (60 - D.getMinutes()) + 'm-' + (60 - D.getSeconds()) + 's';
            element.innerText = "Time left: " + (24 - D.getHours()) + time;
        });
    </script>
@endsection
