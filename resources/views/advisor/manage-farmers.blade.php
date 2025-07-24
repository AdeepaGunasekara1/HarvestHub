<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manage Farmers - HarvestHub Advisor</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans flex flex-col min-h-screen">

  <!-- Topbar -->
  <header class="bg-green-800 text-white shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
      <h1 class="text-xl font-bold tracking-wide">HarvestHub Advisor</h1>
      <nav class="space-x-4 text-sm font-medium hidden md:flex">
        <a href="{{ route('advisor.dashboard') }}" class="hover:text-green-300">Dashboard</a>
        <a href="{{ route('advisor.farmer-registration') }}" class="hover:text-green-300">Register Farmer</a>
        <a href="{{ route('advisor.manage-farmers') }}" class="underline font-semibold">Manage Farmers</a>
<a href="{{ route('advisor.reports') }}">Reports</a>
<a href="{{ route('advisor.profile') }}">Profile</a>

      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto p-6 flex-grow">
    <h2 class="text-3xl font-bold mb-6 text-green-800">Manage Farmers</h2>

    <div class="mb-4 flex flex-col md:flex-row justify-between items-center gap-4">
      <form method="GET" action="{{ route('advisor.manage-farmers') }}" class="w-full md:w-1/2">
        <input
          type="text"
          name="search"
          value="{{ request('search') }}"
          placeholder="Search by name or location..."
          class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500"
        >
      </form>

      <a href="{{ route('advisor.farmer-registration') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 font-semibold">
        + Add Farmer
      </a>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
      <table class="min-w-full text-sm border border-gray-200">
        <thead class="bg-green-100">
          <tr>
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">NIC</th>
            <th class="px-4 py-2 text-left">Location</th>
            <th class="px-4 py-2 text-left">Crops</th>
            <th class="px-4 py-2 text-left">Phone</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($farmers as $farmer)
            <tr>
              <td class="px-4 py-2">{{ $farmer->name }}</td>
              <td class="px-4 py-2">{{ $farmer->nic }}</td>
              <td class="px-4 py-2">{{ $farmer->location }}</td>
              <td class="px-4 py-2">{{ $farmer->crops }}</td>
              <td class="px-4 py-2">{{ $farmer->phone }}</td>
              <td class="px-4 py-2 space-x-2">
                <a href="{{ route('advisor.farmer.edit', $farmer->id) }}" class="text-green-600 hover:underline">Edit</a>
                <form action="{{ route('advisor.farmer.delete', $farmer->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this farmer?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:underline">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-2 text-center text-gray-500">No farmers found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-4">
      {{ $farmers->withQueryString()->links() }}
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-green-800 text-white text-sm py-4 text-center">
    &copy; 2025 HarvestHub – Advisor Panel
  </footer>

</body>
</html>
