User-agent: *

{{ not allowRobotIndex ? 'Disallow: /' }}

{{ allowRobotIndex ? 'Sitemap: ' ~ url('sitemap') }}
Host: {{ app.request.host }}
