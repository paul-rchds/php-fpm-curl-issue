import aiohttp
import asyncio

NUMBER_OF_REQUESTS = 50
URL = 'http://php/serverOne.php'


async def fetch(session, url):
    try:
        async with session.get(url) as response:
            print(response)
            return await response.text()
    except Exception as e:
        print(e)


async def main():
   async with aiohttp.ClientSession() as session:
      tasks = [fetch(session, URL) for _ in range(NUMBER_OF_REQUESTS)]
      await asyncio.gather(*tasks)


if __name__ == '__main__':
    print('Starting stress test.')

    loop = asyncio.get_event_loop()
    loop.run_until_complete(main())
