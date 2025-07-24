<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Advisor Profile - HarvestHub</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

  <!-- Header -->
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <h1 class="text-xl font-bold tracking-wide">HarvestHub Advisor</h1>
      <nav class="space-x-4 text-sm font-medium hidden md:flex">
        <a href="{{ route('advisor.dashboard') }}" class="hover:text-green-300">Dashboard</a>
        <a href="{{ route('advisor.farmer-registration') }}" class="hover:text-green-300">Register Farmer</a>
        <a href="{{ route('advisor.manage-farmers') }}" class="hover:text-green-300">Manage Farmers</a>
        <a href="{{ route('advisor.reports') }}">Reports</a>
        <a href="{{ route('advisor.profile') }}" class="underline font-semibold">Profile</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow">
    <div class="max-w-3xl mx-auto p-6">
      <h2 class="text-3xl font-bold mb-6 text-green-800">My Profile</h2>

      <form method="POST" action="{{ route('advisor.profile.update') }}" class="bg-white p-6 rounded shadow space-y-6">
        @csrf
        @method('PATCH')

        <div>
          <label for="name" class="block text-sm font-semibold mb-1">Full Name</label>
          <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', auth()->user()->name) }}"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
          >
          @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="email" class="block text-sm font-semibold mb-1">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', auth()->user()->email) }}"
            required
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
          >
          @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="district" class="block text-sm font-semibold mb-1">District</label>
          <select
            id="district"
            name="district"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
          >
            @php
              $districts = ['Colombo', 'Anuradhapura', 'Kurunegala', 'Matale', 'Jaffna'];
              $selectedDistrict = old('district', auth()->user()->district ?? 'Anuradhapura');
            @endphp
            @foreach($districts as $district)
              <option value="{{ $district }}" @if($district === $selectedDistrict) selected @endif>{{ $district }}</option>
            @endforeach
          </select>
          @error('district')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <hr class="my-4">

        <div>
          <label for="password" class="block text-sm font-semibold mb-1">New Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Leave blank to keep current"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
          >
          @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-semibold mb-1">Confirm Password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Leave blank to keep current"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-400"
          >
        </div>

        <div class="flex justify-end">
          <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-sm py-4 text-center">
    &copy; 2025 HarvestHub – Advisor Panel
  </footer>

</body>
</html>
