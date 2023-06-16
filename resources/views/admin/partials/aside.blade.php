<aside>
  <ul class="list-unstyled">
    <li>
      <a href="{{ route('admin.home') }}" class="{{ Route::currentRouteName() === 'admin.home' ? "active" : ""}}"><i class="fa-solid fa-chart-line me-2"></i> Dashboard</a>
    </li>
    <li>
      <a href="#"><i class="fa-solid fa-diagram-project me-2"></i> Projects</a>
    </li>
  </ul>
</aside>
