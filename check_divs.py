import sys
for file in sys.argv[1:]:
    with open(file, 'r') as f:
        content = f.read()
        divs = content.count('<div') - content.count('</div')
        print(f"{file}: {divs} unmatched")
