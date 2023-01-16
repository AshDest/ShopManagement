@extends('layouts.default_terminal')
@section('content')
    <br>
    <!-- Start Content-->
    <div class="row">
        <div class=" col-lg-2">
        </div> <!-- end col -->
        <div class=" col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Simple Popover</h4>
                    <p class="text-muted font-14">
                        Popover is a component which displays a box with a content after a click on an
                        element - similar to the tooltip but can contain more content.
                    </p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simple-popover-preview" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link active">
                                Preview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#simple-popover-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                Code
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="simple-popover-preview">
                            <button type="button" class="btn btn-danger" data-bs-toggle="popover" title="Popover title"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                data-bs-container="#simple-popover-preview">Click to toggle
                                popover</button>
                        </div> <!-- end preview-->

                        <div class="tab-pane" id="simple-popover-code">
                            <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;button type=&quot;button&quot; class=&quot;btn btn-danger&quot; data-bs-toggle=&quot;popover&quot; title=&quot;Popover title&quot; data-bs-content=&quot;And here's some amazing content. It's very engaging. Right?&quot;&gt;Click to toggle popover&lt;/button&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                        </div> <!-- end preview code-->
                    </div> <!-- end tab-content-->
                </div> <!-- end card-body -->
            </div> <!-- end card-->

        </div> <!-- end col -->
        <div class=" col-lg-2">


        </div> <!-- end col -->
    </div>
    <!-- container -->
@endsection
