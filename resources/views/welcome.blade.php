@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="background-image: url({{ asset('images/auto-range.jpg') }}); height: 550px; margin-top: 0; padding-top: 5%;">
        <div class="card col-md-4">
            <div class="card-body" >
                <h1 class="card-title">
                    Find a car on sale
                </h1>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Make</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Model</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Year</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">To</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <a href="#" class="btn btn-primary btn-block">Search Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
