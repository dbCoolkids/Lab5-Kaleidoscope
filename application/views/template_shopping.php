<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        {caboose_styles}
        <link rel="stylesheet" type="text/css" href="/assets/css/default.css"/>
	</head>
	<body>
        <div id="container">
            {navbar}
		    <div class='row'>
    			<div class='col-md-9'>
        			<div class='row'>
            			<div class='col-md-4'>
                			{category1}
            			</div>
            			<div class='col-md-4'>
                			{category2}
            			</div>
            			<div class='col-md-4'>
                			{category3}
            			</div>
        			</div>
    			</div>
                <div class="row">
                    {receipt} 
                </div>
    			<div class='col-md-3'>
                    <a class="btn btn-primary" role="button" href="/shopping/checkout">Checkout</a>
		    		<a class="btn btn-default" role="button" href="/shopping/cancel">Cancel This Order</a>
		    	</div>
		    </div>
			{content}
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. {ci_version} </p>
        </div>
            {caboose_scripts}
            {caboose_trailings}
	</body>
</html>