const staticCacheName = 's-app-v1'

const assetUrls = [
    'index.html',
    'style1.css',
	'index2.html',
	'index3.html',
	'index4.html',
	'index5.html'
]

self.addEventListener('install', async event => {
    const cache = await caches.open(staticCacheName)
    await cache.addAll(assetUrls)
  })

self.addEventListener('activate', event => {
    console.log('[SW]: activate')
})

self.addEventListener('fetch', event => {
    console.log('Fetch',event.request)
    event.respondWith(cacheFirst(event.request))
})

async function cacheFirst(request){
    const cached = await caches.match(request)
    return cached ?? await fetch(request)
}