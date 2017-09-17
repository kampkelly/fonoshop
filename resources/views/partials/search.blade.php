<div class="container" id="searchdiv" style="padding: 0px 40px 0px 40px; margin-top: 1px;">
	<form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="item"
                placeholder="Find an item to buy now!"> <span class="input-group-btn">
                <button type="submit" class="btn btn-info">
                    <span class="glyphicon glyphicon-search" style="height: 1.4em;"></span>
                </button>
            </span>
        </div>
    </form>
</div>