<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Advisor Reports - HarvestHub</title>
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
        <a href="{{ route('advisor.reports') }}" class="underline font-semibold">Reports</a>
        <a href="{{ route('advisor.profile') }}" class="hover:text-green-300">Profile</a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto p-6 flex-grow">
    <h2 class="text-3xl font-bold mb-6 text-green-800">Reports & Analytics</h2>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-sm font-semibold text-gray-600">Registered Farmers</h3>
        <p class="text-4xl font-bold text-green-700 mt-2">124</p>
      </div>
      <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-sm font-semibold text-gray-600">Reports Generated</h3>
        <p class="text-4xl font-bold text-green-700 mt-2">18</p>
      </div>
      <div class="bg-white p-6 rounded shadow text-center">
        <h3 class="text-sm font-semibold text-gray-600">Active Districts</h3>
        <p class="text-4xl font-bold text-green-700 mt-2">9</p>
      </div>
    </div>

    <!-- Export Buttons -->
    <div class="flex flex-wrap gap-4 mb-6">
      <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded font-semibold">📄 Generate PDF</button>
      <button class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-4 py-2 rounded font-semibold">📁 Export CSV</button>
    </div>

    <!-- Report Table -->
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="min-w-full text-sm border border-gray-200">
        <thead class="bg-green-100">
          <tr>
            <th class="px-4 py-2 text-left">Report Name</th>
            <th class="px-4 py-2 text-left">Created On</th>
            <th class="px-4 py-2 text-left">Type</th>
            <th class="px-4 py-2 text-left">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr>
            <td class="px-4 py-2">Monthly Farmer Summary</td>
            <td class="px-4 py-2">July 20, 2025</td>
            <td class="px-4 py-2">PDF</td>
            <td class="px-4 py-2">
              <a href="#" class="text-green-600 hover:underline">Download</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2">Crop Distribution Overview</td>
            <td class="px-4 py-2">July 15, 2025</td>
            <td class="px-4 py-2">CSV</td>
            <td class="px-4 py-2">
              <a href="#" class="text-green-600 hover:underline">Download</a>
            </td>
          </tr>
          <tr>
            <td class="px-4 py-2">Regional Farmer Data</td>
            <td class="px-4 py-2">July 10, 2025</td>
            <td class="px-4 py-2">PDF</td>
            <td class="px-4 py-2">
              <a href="#" class="text-green-600 hover:underline">Download</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-sm py-4 text-center">
    &copy; 2025 HarvestHub – Advisor Panel
  </footer>

</body>
</html>
