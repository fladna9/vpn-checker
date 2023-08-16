# vpn-checker
A small PHP web page printing if you're using a VPN. It may help users understand/see if they are connected.

## How to use
It is very stupidly written.
This script will also look for `X-Forwarded-For` header for when you use a Reverse Proxy for example or `CF-Connecting-IP` if using CloudFlare.
You need to change `IP1` and `IP2` in the file with proper IPs.
You can also add some other IPs in the `switch`.
