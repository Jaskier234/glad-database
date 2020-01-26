from random import randint

class A():
  def __init__(self, string):
    self.text = string
    l = string.split()
    self.key = l[0] if len(l) > 0 else ''

  def __eq__(self, other):
    return self.key == other.key

  def __hash__(self):
    return self.key.__hash__()

  def get_unit(self):
    if len(self.text.split()) != 1:
      return 'szt.'
    else:
      return 'kg.'

s = set()
with open('prod_list.txt') as file:
  r = file.read().split('\n')
  for l in r:
    s.add(A(l))

def rand_price():
  return (randint(5,100) * 10 - 1) / 100

for i ,prod in enumerate(s):
  print(i, prod.text.replace(',', ''), randint(100,350), prod.get_unit(), rand_price(), randint(1,9), sep=',')
