<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Advisor Dashboard - HarvestHub</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- Topbar -->
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <h1 class="text-xl font-bold tracking-wide">HarvestHub Advisor</h1>
<nav class="space-x-4 text-sm font-medium hidden md:flex">
<a href="{{ route('advisor.dashboard') }}" class="underline font-semibold">Dashboard</a>
<a href="{{ route('advisor.farmer-registration') }}" class="hover:text-green-300">Register Farmer</a>
<a href="{{ route('advisor.manage-farmers') }}" class="hover:text-green-300">Manage Farmers</a>
<a href="{{ route('advisor.reports') }}" class="hover:text-green-300">Reports</a>
<a href="{{ route('advisor.profile') }}" class="hover:text-green-300">Profile</a>

</nav>

    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto p-6">
    <h2 class="text-3xl font-bold mb-6 text-green-800">Dashboard Overview</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-green-700">Total Farmers</h3>
        <p class="text-4xl font-bold text-gray-800">124</p>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-green-700">New Registrations</h3>
        <p class="text-4xl font-bold text-gray-800">8</p>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2 text-green-700">Reports Generated</h3>
        <p class="text-4xl font-bold text-gray-800">34</p>
      </div>
    </div>

    <div class="mt-10 bg-white p-6 rounded shadow">
      <h3 class="text-xl font-bold text-green-700 mb-4">Recent Farmer Registrations</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm border border-gray-200">
          <thead class="bg-green-100">
            <tr>
              <th class="px-4 py-2 text-left">Farmer Name</th>
              <th class="px-4 py-2 text-left">Location</th>
              <th class="px-4 py-2 text-left">Date Registered</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr>
              <td class="px-4 py-2">Saman Perera</td>
              <td class="px-4 py-2">Kurunegala</td>
              <td class="px-4 py-2">July 23, 2025</td>
            </tr>
            <tr>
              <td class="px-4 py-2">Nimali Fernando</td>
              <td class="px-4 py-2">Matale</td>
              <td class="px-4 py-2">July 22, 2025</td>
            </tr>
            <tr>
              <td class="px-4 py-2">Kamal Silva</td>
              <td class="px-4 py-2">Anuradhapura</td>
              <td class="px-4 py-2">July 21, 2025</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-sm py-4 mt-10 text-center">
    &copy; 2025 HarvestHub – Advisor Panel
  </footer>

</body>
</html>
