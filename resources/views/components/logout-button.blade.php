<form method="POST" action="{{ route('logout') }}" style="display:inline;">
    @csrf
    <button type="submit" class="nav-link"
        style="background:none; border-color:black; cursor:pointer; color:white; padding: 8px 18px; border-radius:25px; font-weight:700; font-size:larger; transition: all 0.3s ease;"
        onmouseover="this.style.background='rgba(255,255,255,0.15)'; this.style.color='#f7c94b';"
        onmouseout="this.style.background='transparent'; this.style.color='white';">
        Logout
    </button>
</form>
