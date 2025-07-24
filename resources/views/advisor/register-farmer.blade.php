<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register Farmer - HarvestHub Advisor</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- Topbar -->
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <h1 class="text-xl font-bold tracking-wide">HarvestHub Advisor</h1>
      <nav class="space-x-4 text-sm font-medium hidden md:flex">
        <a href="{{ route('advisor.dashboard') }}" class="hover:text-green-300">Dashboard</a>
        <a href="{{ route('advisor.farmer-registration') }}" class="underline font-semibold">Register Farmer</a>
        <a href="{{ route('advisor.manage-farmers') }}" class="hover:text-green-300">Manage Farmers</a>
        <a href="{{ route('advisor.reports') }}">Reports</a>
        <a href="{{ route('advisor.profile') }}">Profile</a>

      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-3xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-green-800">Farmer Registration</h2>

    <!-- Success Message -->
    @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('advisor.farmer-registration.submit') }}" method="POST" class="bg-white p-6 rounded shadow space-y-5">
      @csrf
      
      <div>
        <label class="block text-sm font-medium mb-1" for="name">Full Name</label>
        <input
          type="text"
          id="name"
          name="name"
          required
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('name') }}"
        >
        @error('name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="nic">NIC Number</label>
        <input
          type="text"
          id="nic"
          name="nic"
          required
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('nic') }}"
        >
        @error('nic')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="location">Location</label>
        <input
          type="text"
          id="location"
          name="location"
          required
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('location') }}"
        >
        @error('location')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="phone">Phone Number</label>
        <input
          type="tel"
          id="phone"
          name="phone"
          required
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('phone') }}"
        >
        @error('phone')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="email">Email Address (optional)</label>
        <input
          type="email"
          id="email"
          name="email"
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('email') }}"
        >
        @error('email')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="crops">Main Crops</label>
        <input
          type="text"
          id="crops"
          name="crops"
          placeholder="E.g., Paddy, Vegetables"
          class="w-full border border-gray-300 px-4 py-2 rounded focus:ring-2 focus:ring-green-500"
          value="{{ old('crops') }}"
        >
        @error('crops')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button
        type="submit"
        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded transition"
      >
        Register Farmer
      </button>
    </form>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-sm py-4 mt-10 text-center">
    &copy; 2025 HarvestHub – Advisor Panel
  </footer>

</body>
</html>
