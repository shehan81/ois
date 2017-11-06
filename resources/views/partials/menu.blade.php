<?php
$segments = Request::segments();
$module = 'home';
$action = $module . '.' . 'index';
if (count($segments) > 0) {
    $module = $segments[0];
    $action = $module . '.' . 'index';
    if (!empty($segments[1])) {
        $action = $module . '.' . $segments[1];
    }
}
?>
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview {{ $module ==  'timeframe' ? 'active' : ''  }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Time frames</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ $action == 'timeframe.index' ? 'active' : ''  }}"><a href="{{ route('timeframe.index')}}"><i class="fa fa-circle-o"></i>Show Time frames</a></li>
            <li class="{{ $action == 'timeframe.create' ? 'active' : ''  }}"><a href="{{ route('timeframe.create')}}"><i class="fa fa-circle-o"></i>Add Time frame</a></li>
        </ul>
    </li>
    
     <li class="treeview {{ $module ==  'subject' ? 'active' : ''  }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Subjects</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ $action == 'subject.index' ? 'active' : ''  }}"><a href="{{ route('subject.index')}}"><i class="fa fa-circle-o"></i>Show Subjects</a></li>
            <li class="{{ $action == 'subject.create' ? 'active' : ''  }}"><a href="{{ route('subject.create')}}"><i class="fa fa-circle-o"></i>Add Subject</a></li>
        </ul>
    </li>

    <li class="treeview {{ $module ==  'instructor' ? 'active' : ''  }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Instructors</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ $action == 'instructor.index' ? 'active' : ''  }}"><a href="{{ route('instructor.index')}}"><i class="fa fa-circle-o"></i>Show Instructors</a></li>
            <li class="{{ $action == 'instructor.create' ? 'active' : ''  }}"><a href="{{ route('instructor.create')}}"><i class="fa fa-circle-o"></i>Register Instructor</a></li>
        </ul>
    </li>

    <li class="treeview {{ $module ==  'student' ? 'active' : ''  }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Students</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ $action == 'student.index' ? 'active' : ''  }}"><a href="{{ route('student.index')}}"><i class="fa fa-circle-o"></i>Show Students</a></li>
            <li class="{{ $action == 'student.create' ? 'active' : ''  }}"><a href="{{ route('student.create')}}"><i class="fa fa-circle-o"></i>Register Student</a></li>
        </ul>
    </li>

    <li class="treeview {{ $module ==  'class' ? 'active' : ''  }}">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Classes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ $action == 'class.index' ? 'active' : ''  }}"><a href="{{ route('class.index')}}"><i class="fa fa-circle-o"></i>Show Classes</a></li>
            <li class="{{ $action == 'class.create' ? 'active' : ''  }}"><a href="{{ route('class.create')}}"><i class="fa fa-circle-o"></i>Add Class</a></li>
            <li class="{{ $action == 'assign' ? 'active' : ''  }}"><a href="{{ route('assign')}}"><i class="fa fa-circle-o"></i>Assign Students</a></li>
        </ul>
    </li>



    <li class="header">Shortcuts</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Classes</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Instructors</span></a></li>
</ul>
