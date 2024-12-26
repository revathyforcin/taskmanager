<aside class="sidebar">
    <div class="sidebar-header">
        <h2>Dashboard</h2>
    </div>
    <nav class="menu">
        <a href="{{ route('dashboard') }}">Home</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.tasks') }}">Tasks</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
