<div class="container" id="searchdiv" style="padding: 0px 40px 0px 40px;">
	<form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                placeholder="Search laptops, desktops, phones, softwares, hard disks, etc..."> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search" style="height: 1.4em;"></span>
                </button>
            </span>
        </div>
    </form>
</div>