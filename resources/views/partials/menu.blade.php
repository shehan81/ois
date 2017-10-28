<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Classes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="index.html"><i class="fa fa-circle-o"></i>Show Classes</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i>Add Class</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Instructors</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('instructor.index')}}"><i class="fa fa-circle-o"></i>Show Instructors</a></li>
            <li><a href="{{ route('instructor.create')}}"><i class="fa fa-circle-o"></i>Add Instructor</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Subjects</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ route('subject.index')}}"><i class="fa fa-circle-o"></i>Show Subjects</a></li>
            <li><a href="{{ route('subject.create')}}"><i class="fa fa-circle-o"></i>Add Subject</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Students</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Time frames</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        </ul>
    </li>

    <li class="header">Shortcuts</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Classes</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Instructors</span></a></li>
</ul>
