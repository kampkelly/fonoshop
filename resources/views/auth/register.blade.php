@extends('layouts.new_master')

@section('content')
<div class="container">
<!--<a class="btn btn-info" href="{{ URL::previous() }}">back</a> -->
<a href="/home">Back to home</a>
    <form action="/newregister" method="POST" class="form-horizontal first-form" role="form" files="true" enctype="multipart/form-data">
    {{ csrf_field() }}
        <h4 class="text-center">Please signup to submit your product</h4>
            @if(@isset ($price))
                <div class="form-group">
                    <label for="product_title" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Title <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Name of product" required="true" minlength="4" value="{{$product_title}}" style="background-color: #f2f2f2;">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price of product" required="true" value="{{$price}}" style="background-color: #f2f2f2;">
                    </div>
                </div>
            @else
                 <div class="form-group">
                    <label for="product_title" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Title <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="product_title" id="product_title" class="form-control" required="required" placeholder="Name of product" required="true" minlength="4">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Price <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="price" id="price" class="form-control" required="required" placeholder="Price of product" required="true">
                    </div>
                </div>
            @endif
                <div class="form-group">
                    <label for="phone" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Category <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" required="true">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Cover Photo <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                    <!--    <input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> --><span class="asterisks small">(cover photo)</span>
                        <input type="file" name="image" id="image" class="btn btn-warning btn-block" required="true" accept="image/*" onchange="validateFileType()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Additional Photos <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                    <!--    <input type="file" name="photo" id="photo" placeholder="Enter Title" class="btn btn-success"> --><span class="asterisks small">(can select multiple photos)</span>
                        <input type="file" name="photos[]" id="photo" class="btn btn-success btn-block" required="true" accept="image/*" onchange="validateFileType()" multiple />
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Description <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <textarea class="form-control" rows="2" columns="1" name="description" placeholder="Enter full description of product including accessories, functions, etc." required="true"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-3">
                    
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-3 col-lg-1">
                        <label>Condition <span class="asterisks">*</span></label>
                    </div>
                    <div class="col-xs-2 col-sm-3 col-md-1 col-lg-1 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-0" style="margin-top: -15px">
                        <div class="radio">
                            <label>
                                <input type="radio" name="condition" id="input" value="new" checked="">
                                New
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-6 col-lg-6" style="margin-top: -15px">
                        <div class="radio">
                            <label>
                                <input type="radio" name="condition" id="input" value="used">
                                Used
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="state" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">State <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <select name="state" id="state" class="form-control">
                            @foreach($states as $state)
                                <option value="{{$state}}" required="true">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">City <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="city" id="city" class="form-control" required="required" placeholder="Enter City" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Phone <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="phone" id="phone" class="form-control" required="required" placeholder="Phone Number" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Name <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Full Name" required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Email <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Address" required="true">
                    </div>
                </div>             
                <div class="form-group">
                    <label for="password" class="col-xs-3 col-sm-4 col-md-4 col-lg-4 control-label">Pasword <span class="asterisks">*</span></label>
                    <div class="col-xs-8 col-sm-5 col-md-4 col-lg-4">
                        <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Enter Password" required="true" minlength="8">
                    </div>
                </div>
                 <div class="form-group">
                    <div class="col-xs-12 col-sm-8 col-md-7 col-lg-4 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">
                            Submit
                        </button>
                    </div>
                </div>
    </form>
</div>
@endsection
