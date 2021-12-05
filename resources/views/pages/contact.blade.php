@extends('layouts.app')
@section('content')
    @include('layouts.navbar')
    
    <div id="mainBody">
        <div class="container">
            <hr class="soften">
            <h1>Visit us</h1>
            <hr class="soften"/>	
            <div class="row">

                <div class="span4">
                <h4>Contact Details</h4><hr>
                <p>	<i class="fa fa-map-marker "></i> Zouk Mosbeh Highway,<br/> Kesrouane, Lebanon
                    <br/><br/>
                    <i class="fa fa-envelope-o"></i> info@webshop.com<br/>
                    <i class="fa fa-phone"></i> Tel 01 234 567<br/>
                    <i class="fa fa-fax"></i> Fax 01 234 567<br/>
                </p>		
                </div>
                    
                <div class="span4">
                <h4>Opening Hours</h4><hr>
                    <h5> Monday - Friday</h5>
                    <li>08:00am - 05:00pm<br/><br/></li>
                    <h5>Saturday</h5>
                    <li>08:00am - 01:00pm<br/><br/></li>
                </div>

                <div class="span4">
                <h4>Location</h4> <br>
                <img style="width:75%" src={{asset('images/icons/frame2.png')}} alt="special offers"/>
                </div>

            </div>
            <br><hr><br>

            <div class="row">
            <div class="span12">
            <iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.5872025522976!2d35.61374901568946!3d33.95174378063333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f3f72fac77845%3A0x252e966886767054!2sNotre%20Dame%20University%20-%20Louaize!5e0!3m2!1sen!2slb!4v1601042791409!5m2!1sen!2slb"></iframe><br />
            <small><a href="https://www.google.com/maps?ll=33.951744,35.615938&z=15&t=m&hl=en&gl=LB&mapclient=embed&cid=2679244204008697940" style="color:#0000FF;text-align:left">View Larger Map</a></small>
            </div>
            </div>
        </div>
        </div>

        </div>
        



